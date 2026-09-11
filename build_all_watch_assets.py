import os
import shutil
import numpy as np
from PIL import Image
from collections import deque

def extract_isolated_png(img_path):
    img = Image.open(img_path).convert('RGB')
    arr = np.array(img)
    h, w, _ = arr.shape
    
    is_white = (arr[:, :, 0] > 238) & (arr[:, :, 1] > 238) & (arr[:, :, 2] > 238)
    
    visited = np.zeros((h, w), dtype=bool)
    queue = deque()
    
    for x in range(w):
        if is_white[0, x]: queue.append((0, x)); visited[0, x] = True
        if is_white[h-1, x]: queue.append((h-1, x)); visited[h-1, x] = True
    for y in range(h):
        if is_white[y, 0]: queue.append((y, 0)); visited[y, 0] = True
        if is_white[y, w-1]: queue.append((y, w-1)); visited[y, w-1] = True
        
    while queue:
        cy, cx = queue.popleft()
        for dy, dx in [(-1,0), (1,0), (0,-1), (0,1)]:
            ny, nx = cy + dy, cx + dx
            if 0 <= ny < h and 0 <= nx < w and not visited[ny, nx]:
                if is_white[ny, nx]:
                    visited[ny, nx] = True
                    queue.append((ny, nx))
                    
    rgba = np.zeros((h, w, 4), dtype=np.uint8)
    rgba[:, :, :3] = arr
    
    diff = np.sqrt((255.0 - arr[:, :, 0])**2 + (255.0 - arr[:, :, 1])**2 + (255.0 - arr[:, :, 2])**2)
    alpha = np.where(visited, np.clip((diff - 8) / 25.0, 0.0, 1.0) * 255.0, 255.0)
    rgba[:, :, 3] = alpha.astype(np.uint8)
    
    return Image.fromarray(rgba, 'RGBA')

def apply_color_transformation(base_rgba, mode='default'):
    arr = np.array(base_rgba, dtype=np.float32)
    r, g, b, a = arr[:, :, 0], arr[:, :, 1], arr[:, :, 2], arr[:, :, 3]
    
    fg = a > 50
    lum = 0.299 * r + 0.587 * g + 0.114 * b
    
    if mode == 'emerald_green':
        is_blue = (b > r + 15) & (b > g - 15) & fg
        r[is_blue] = r[is_blue] * 0.2
        g[is_blue] = np.clip(b[is_blue] * 1.05 + 15, 0, 255)
        b[is_blue] = b[is_blue] * 0.35
        
    elif mode == 'crimson_red':
        is_blue = (b > r + 10) & fg
        old_b = b[is_blue].copy()
        r[is_blue] = np.clip(old_b * 1.25 + 20, 0, 255)
        g[is_blue] = old_b * 0.2
        b[is_blue] = old_b * 0.2
        
    elif mode == 'champagne_gold':
        is_blue = (b > r + 10) & fg
        r[is_blue] = np.clip(lum[is_blue] * 1.15 + 10, 0, 245)
        g[is_blue] = np.clip(lum[is_blue] * 0.95, 0, 225)
        b[is_blue] = np.clip(lum[is_blue] * 0.65, 0, 170)
        is_metal = fg & ~is_blue
        r[is_metal] = np.clip(r[is_metal] * 1.08 + 8, 0, 255)
        g[is_metal] = np.clip(g[is_metal] * 1.02 + 4, 0, 255)
        b[is_metal] = np.clip(b[is_metal] * 0.88, 0, 255)

    elif mode == 'rose_gold_petite':
        is_blue = (b > r + 5) & fg
        r[is_blue] = np.clip(lum[is_blue] * 1.15 + 35, 0, 250)
        g[is_blue] = np.clip(lum[is_blue] * 0.88 + 15, 0, 220)
        b[is_blue] = np.clip(lum[is_blue] * 0.85 + 20, 0, 215)
        is_metal = fg & ~is_blue
        r[is_metal] = np.clip(r[is_metal] * 1.25 + 25, 0, 255)
        g[is_metal] = np.clip(g[is_metal] * 0.92 + 10, 0, 230)
        b[is_metal] = np.clip(b[is_metal] * 0.82 + 5, 0, 210)

    elif mode == 'phantom_black':
        r[fg] = np.clip(lum[fg] * 0.55, 0, 255)
        g[fg] = np.clip(lum[fg] * 0.55, 0, 255)
        b[fg] = np.clip(lum[fg] * 0.58, 0, 255)

    elif mode == 'classic_white_dial':
        is_blue = (b > r + 5) & fg
        r[is_blue] = np.clip(lum[is_blue] * 1.35 + 50, 0, 250)
        g[is_blue] = np.clip(lum[is_blue] * 1.35 + 50, 0, 250)
        b[is_blue] = np.clip(lum[is_blue] * 1.35 + 50, 0, 250)

    elif mode == 'terracotta_copper':
        is_blue = (b > r + 5) & fg
        r[is_blue] = np.clip(lum[is_blue] * 1.3 + 30, 0, 240)
        g[is_blue] = np.clip(lum[is_blue] * 0.75 + 10, 0, 180)
        b[is_blue] = np.clip(lum[is_blue] * 0.55, 0, 140)
        is_metal = fg & ~is_blue
        r[is_metal] = np.clip(r[is_metal] * 1.15 + 15, 0, 255)
        g[is_metal] = np.clip(g[is_metal] * 0.95 + 5, 0, 235)
        b[is_metal] = np.clip(b[is_metal] * 0.82, 0, 210)

    elif mode == 'tactical_sage':
        is_blue = (b > r + 5) & fg
        r[is_blue] = np.clip(lum[is_blue] * 0.75 + 15, 0, 210)
        g[is_blue] = np.clip(lum[is_blue] * 0.95 + 30, 0, 235)
        b[is_blue] = np.clip(lum[is_blue] * 0.70 + 10, 0, 190)

    elif mode == 'blush_pink':
        is_blue = (b > r + 5) & fg
        r[is_blue] = np.clip(lum[is_blue] * 1.25 + 40, 0, 255)
        g[is_blue] = np.clip(lum[is_blue] * 0.95 + 20, 0, 225)
        b[is_blue] = np.clip(lum[is_blue] * 1.05 + 30, 0, 235)
        is_metal = fg & ~is_blue
        r[is_metal] = np.clip(r[is_metal] * 1.2 + 20, 0, 255)
        g[is_metal] = np.clip(g[is_metal] * 0.95 + 10, 0, 235)
        b[is_metal] = np.clip(b[is_metal] * 0.88 + 5, 0, 220)

    arr[:, :, 0] = np.clip(r, 0, 255)
    arr[:, :, 1] = np.clip(g, 0, 255)
    arr[:, :, 2] = np.clip(b, 0, 255)
    arr[:, :, 3] = np.clip(a, 0, 255)
    
    return Image.fromarray(arr.astype(np.uint8), 'RGBA')

def main():
    brain_dir = r'C:\Users\ASUS\.gemini\antigravity-ide\brain\b10878b8-a680-4b0c-9fa6-425828fc8393'
    pub_home = r'd:\laragonzo\www\bp\ecommerce\jamtangan\public\images\home'
    pub_prod = r'd:\laragonzo\www\bp\ecommerce\jamtangan\public\images\products'
    
    chrono_src = os.path.join(brain_dir, 'prod_chrono_blue_1789122974958.jpg')
    heritage_src = os.path.join(brain_dir, 'prod_heritage_steel_1789123003462.jpg')
    
    print('Extracting base watch images...')
    base_chrono = extract_isolated_png(chrono_src)
    base_heritage = extract_isolated_png(heritage_src)
    
    watch_blue = base_chrono
    watch_steel = base_heritage
    watch_green = apply_color_transformation(base_chrono, 'emerald_green')
    watch_rosegold = apply_color_transformation(base_heritage, 'rose_gold_petite')
    watch_white = apply_color_transformation(base_chrono, 'classic_white_dial')
    watch_silver_bauhaus = apply_color_transformation(base_heritage, 'classic_white_dial')
    watch_champagne = apply_color_transformation(base_chrono, 'champagne_gold')
    watch_black = apply_color_transformation(base_chrono, 'phantom_black')
    watch_red = apply_color_transformation(base_chrono, 'crimson_red')
    watch_sage = apply_color_transformation(base_heritage, 'tactical_sage')
    watch_pink = apply_color_transformation(base_heritage, 'blush_pink')
    watch_terracotta = apply_color_transformation(base_chrono, 'terracotta_copper')
    watch_gold_heritage = apply_color_transformation(base_heritage, 'champagne_gold')
    
    # Homepage Morphing Category Cards
    watch_blue.save(os.path.join(pub_home, 'cat-blue-runner.png'))
    watch_steel.save(os.path.join(pub_home, 'cat-grey-sneaker.png'))
    watch_rosegold.save(os.path.join(pub_home, 'cat-pink-flat.png'))
    watch_green.save(os.path.join(pub_home, 'cat-sage-runner.png'))
    
    # Homepage Best Sellers Cards
    watch_white.save(os.path.join(pub_home, 'bs-canvas-cruiser.png'))
    watch_silver_bauhaus.save(os.path.join(pub_home, 'bs-cruiser-white.png'))
    watch_champagne.save(os.path.join(pub_home, 'bs-runner-beige.png'))
    watch_black.save(os.path.join(pub_home, 'bs-runner-charcoal.png'))
    
    # Catalog & Detail Product Images
    watch_white.save(os.path.join(pub_prod, 'canvas-cruiser-white.png'))
    watch_silver_bauhaus.save(os.path.join(pub_prod, 'cruiser-slipon-blizzard.png'))
    watch_champagne.save(os.path.join(pub_prod, 'runner-nz-mushroom.png'))
    watch_black.save(os.path.join(pub_prod, 'runner-nz-anthracite.png'))
    watch_gold_heritage.save(os.path.join(pub_prod, 'runner-nz-oat.png'))
    
    watch_blue.save(os.path.join(pub_prod, 'tree-dasher-navy.png'))
    watch_red.save(os.path.join(pub_prod, 'tree-dasher-red.png'))
    watch_sage.save(os.path.join(pub_prod, 'tree-dasher-sage.png'))
    
    watch_pink.save(os.path.join(pub_prod, 'tree-lounger-pink.png'))
    watch_terracotta.save(os.path.join(pub_prod, 'tree-lounger-terracotta.png'))
    
    watch_blue.save(os.path.join(pub_prod, 'tree-runner-blue.png'))
    watch_green.save(os.path.join(pub_prod, 'tree-runner-forest.png'))
    watch_white.save(os.path.join(pub_prod, 'tree-runner-white.png'))
    
    watch_black.save(os.path.join(pub_prod, 'wool-runner-black.png'))
    watch_steel.save(os.path.join(pub_prod, 'wool-runner-grey.png'))
    
    print('All watch image assets successfully generated with crystal-clear transparent backgrounds!')

if __name__ == '__main__':
    main()

<!DOCTYPE html>
<html lang="en" data-theme="light" data-font-size="medium" data-font-type="default">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?php echo escape_output($page_title ?? 'Resource Directory - OUTSINC'); ?></title>
    <link rel="stylesheet" href="/assets/css/main.css">
    <link rel="stylesheet" href="/assets/css/components.css">
</head>
<body>
    <div class="container">
        <header class="page-header">
            <h1>Resource Directory</h1>
            <p>Find local help fast - Shelter, food, health & more</p>
        </header>
        
        <div class="directory-filters">
            <select id="category-filter">
                <option value="">All Categories</option>
                <option value="food">Food & Nutrition</option>
                <option value="health">Health & Medical</option>
                <option value="housing">Housing</option>
                <option value="transportation">Transportation</option>
                <option value="legal">Legal</option>
            </select>
            
            <label class="toggle-switch">
                <input type="checkbox" id="open-now-filter">
                <span class="toggle-slider"></span>
                Open Now
            </label>
            
            <input type="search" placeholder="Search resources..." class="search-input">
        </div>
        
        <main class="directory-content">
            <div class="resources-grid">
                <?php
                try {
                    $stmt = $pdo->prepare("SELECT * FROM resources WHERE is_active = 1 ORDER BY is_featured DESC, name ASC");
                    $stmt->execute();
                    $resources = $stmt->fetchAll();
                    
                    foreach ($resources as $resource): ?>
                    <div class="resource-card">
                        <h3><?php echo escape_output($resource['name']); ?></h3>
                        <p class="resource-category"><?php echo escape_output($resource['category']); ?></p>
                        <p><?php echo escape_output($resource['description']); ?></p>
                        
                        <?php if ($resource['address']): ?>
                        <p class="resource-address">📍 <?php echo escape_output($resource['address']); ?></p>
                        <?php endif; ?>
                        
                        <?php if ($resource['phone']): ?>
                        <p class="resource-phone">📞 <a href="tel:<?php echo escape_output($resource['phone']); ?>"><?php echo escape_output($resource['phone']); ?></a></p>
                        <?php endif; ?>
                        
                        <?php if ($resource['website']): ?>
                        <p class="resource-website">🌐 <a href="<?php echo escape_output($resource['website']); ?>" target="_blank" rel="noopener">Website</a></p>
                        <?php endif; ?>
                        
                        <p class="resource-hours">🕒 <?php echo escape_output($resource['hours']); ?></p>
                        
                        <div class="resource-actions">
                            <button class="btn btn-sm favorite-btn" data-resource-id="<?php echo $resource['id']; ?>">
                                ♡ Save to favorites
                            </button>
                        </div>
                    </div>
                    <?php endforeach;
                } catch (Exception $e) {
                    echo '<p>Resources temporarily unavailable.</p>';
                }
                ?>
            </div>
        </main>
        
        <div class="directory-actions">
            <a href="#" class="btn" data-modal="suggest-resource">Suggest an update</a>
        </div>
        
        <nav class="page-nav">
            <a href="/" class="btn">← Back to Home</a>
        </nav>
    </div>
    
    <script src="/assets/js/main.js"></script>
</body>
</html>
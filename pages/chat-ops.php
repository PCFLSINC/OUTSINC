<!DOCTYPE html>
<html lang="en" data-theme="light" data-font-size="medium" data-font-type="default">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?php echo escape_output($page_title ?? 'Chat Operations - OUTSINC'); ?></title>
    <link rel="stylesheet" href="/assets/css/main.css">
    <link rel="stylesheet" href="/assets/css/components.css">
</head>
<body>
    <div class="container">
        <header class="page-header">
            <h1>Chat Operations</h1>
            <p>Operator console - Powers "Live now" status</p>
        </header>
        
        <main class="chat-ops-interface">
            <div class="operator-status">
                <h2>Operator Status</h2>
                <div class="status-controls">
                    <label>
                        <input type="radio" name="status" value="online"> Online
                    </label>
                    <label>
                        <input type="radio" name="status" value="away"> Away
                    </label>
                    <label>
                        <input type="radio" name="status" value="offline"> Offline
                    </label>
                </div>
            </div>
            
            <div class="active-chats">
                <h2>Active Chat Sessions</h2>
                <div class="chat-queue">
                    <p>No active chat sessions</p>
                </div>
            </div>
            
            <div class="chat-history">
                <h2>Recent Chats</h2>
                <div class="history-list">
                    <p>Chat history will appear here</p>
                </div>
            </div>
        </main>
        
        <nav class="page-nav">
            <a href="/" class="btn">← Back to Home</a>
        </nav>
    </div>
    
    <script src="/assets/js/main.js"></script>
</body>
</html>
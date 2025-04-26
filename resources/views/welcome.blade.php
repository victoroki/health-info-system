<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="refresh" content="3;url=/login">
    <title>HealthConnect | Doctor Portal</title>
    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <!-- Font Awesome -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
    <style>
        :root {
            --primary-color: #2c3e50;
            --secondary-color: #3498db;
            --accent-color: #e74c3c;
            --light-color: #ecf0f1;
        }
        
        body {
            font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
            background-color: #f8f9fa;
            color: var(--primary-color);
            height: 100vh;
            display: flex;
            align-items: center;
            justify-content: center;
        }
        
        .welcome-card {
            border: none;
            border-radius: 10px;
            box-shadow: 0 10px 30px rgba(0, 0, 0, 0.1);
            overflow: hidden;
            max-width: 800px;
            width: 100%;
        }
        
        .welcome-header {
            background-color: var(--primary-color);
            color: white;
            padding: 3rem;
            text-align: center;
        }
        
        .welcome-body {
            padding: 3rem;
            text-align: center;
        }
        
        .spinner {
            width: 3rem;
            height: 3rem;
            margin: 2rem auto;
            color: var(--secondary-color);
        }
        
        .feature-icon {
            font-size: 2rem;
            color: var(--secondary-color);
            margin-bottom: 1rem;
        }
        
        .system-features {
            background-color: rgba(52, 152, 219, 0.05);
            border-radius: 10px;
            padding: 2rem;
            margin-top: 2rem;
        }
    </style>
</head>
<body>
    <div class="welcome-card">
        <div class="welcome-header">
            <h1><i class="fas fa-heartbeat me-2"></i> HealthConnect</h1>
            <p class="mb-0">Doctor Portal - Health Information System</p>
        </div>
        
        <div class="welcome-body">
            <div class="spinner-border" role="status">
                <span class="visually-hidden">Loading...</span>
            </div>
            <h3>Redirecting to Login...</h3>
            <p class="text-muted">You will be automatically redirected to the login page</p>
            
            <div class="system-features">
                <div class="row">
                    <div class="col-md-4">
                        <i class="fas fa-procedures feature-icon"></i>
                        <h5>Health Programs</h5>
                        <p class="text-muted">Manage TB, Malaria, HIV and other health programs</p>
                    </div>
                    
                    <div class="col-md-4">
                        <i class="fas fa-user-plus feature-icon"></i>
                        <h5>Client Management</h5>
                        <p class="text-muted">Register and manage client information</p>
                    </div>
                    
                    <div class="col-md-4">
                        <i class="fas fa-search feature-icon"></i>
                        <h5>Advanced Search</h5>
                        <p class="text-muted">Quickly find client records</p>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Bootstrap JS Bundle with Popper -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
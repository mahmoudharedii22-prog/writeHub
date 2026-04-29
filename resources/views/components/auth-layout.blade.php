<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>{{ $title ?? 'Auth' }} | WriteHub</title>

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">

    <style>
        body {
            background: #f5f7fb;
        }

        .auth-card {
            border: none;
            border-radius: 12px;
        }
    </style>
</head>

<body>

    <div class="container d-flex align-items-center justify-content-center min-vh-100">

        <div class="col-md-6 col-lg-5 py-4">
            <div class="card shadow-sm auth-card p-4">

 
                <div class="text-center mb-4">
                    <h4 class="fw-bold">WriteHub</h4>
                    <p class="text-muted small mb-0">
                        {{ $subtitle ?? '' }}
                    </p>
                </div>

                {{ $slot }}

            </div>
        </div>

    </div>

</body>

</html>

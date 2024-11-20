<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Login Failure</title>

    <style>
        body {
            background-color: #f2f2f2;
            font-family: sans-serif;
        }

        .container {
            width: 400px;
            margin: 50px auto;
            background-color: #fff;
            padding: 20px;
            border: 1px solid #ccc;
            text-align: center;
        }

        h1 {
            margin-bottom: 20px;
        }

        .message {
            margin-bottom: 10px;
        }

        .login-link {
            text-decoration: none;
            color: #007bff;
        }

        #wildlife-video {
            position: absolute;
            top: 0;
            left: 0;
            width: 100%;
            height: 100%;
            object-fit: cover;
            opacity: 0.5;
            transition: opacity 0.5s ease-in-out;
            z-index: -1;
        }

        .container:hover #wildlife-video {
            opacity: 1;
        }
    </style>
</head>
<body>
    <div class="container">
        <h1>Login Failed</h1>
        <p class="message">Please try logging in again.</p>
        <a href="Login.php" class="login-link">Login</a>

        <script>
            // Create the video element
            const videoElement = document.createElement('video');
            videoElement.id = 'wildlife-video';
            videoElement.autoplay = true;
            videoElement.loop = true;
            videoElement.muted = true;

            // Create the video source
            const videoSource = document.createElement('source');
            videoSource.src = 'video/Rainforest animation.mp4'; // Change the video source URL
            videoSource.type = 'video/mp4';


            // Append the video source to the video element
            videoElement.appendChild(videoSource);

            // Append the video element to the container
            document.body.appendChild(videoElement);
        </script>
    </div>
</body>
</html>
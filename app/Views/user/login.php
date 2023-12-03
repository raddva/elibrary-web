<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login | E-Library</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.1.1/css/all.min.css" integrity="sha512-KfkfwYDsLkIlwQp6LFnl8zNdLGxu9YAA1QvwINks4PhcElQSvqcyVLLD9aMhXd13uQjoXtEKNosOWaZqXgel0g==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <link href="/css/login.css" rel="stylesheet">
</head>

<body>

    <div class="container" id="container">
        <div class="form-container sign-up-container">
            <form action="/user/register" method="post">
                <h1>Create Account</h1>
                <span>Let's Create a new account for you</span>
                <?php if (session()->getFlashdata('msg')) : ?>
                    <div class="alert alert-3-danger">
                        <h3 class="alert-title">Error!</h3>
                        <p class="alert-content"><?= session()->getFlashdata('msg'); ?></p>
                    </div>
                <?php endif; ?>
                <div class="infield">
                    <input type="text" placeholder="Name" name="name" />
                </div>
                <div class="infield">
                    <input type="text" placeholder="Username" name="username" />
                </div>
                <div class="infield">
                    <input type="email" placeholder="Email" name="email" />
                </div>
                <div class="infield">
                    <input type="password" placeholder="Password" name="password" />
                </div>
                <button>Sign Up</button>
            </form>
        </div>

        <div class="form-container sign-in-container">

            <form action="/user/auth" method="post">
                <h1 class="">Log In</h1>
                <span>To keep us connected, please fill the login form</span>
                <?php if (session()->getFlashdata('msg')) : ?>
                    <div class="alert">
                        <span class="closebtn" onclick="this.parentElement.style.display='none';">&times;</span>
                        <?= session()->getFlashdata('msg'); ?>
                    </div>
                <?php endif; ?>
                <div class="infield">
                    <input type="text" placeholder="Username" name="username" />
                </div>
                <div class="infield">
                    <input type="password" placeholder="Password" name="password" />
                </div>
                <button>Log In</button>
            </form>
        </div>
        <div class="overlay-container" id="overlayCon">
            <div class="overlay">
                <div class="overlay-panel overlay-right">
                    <h1>Welcome Back!</h1>
                    <p>You don't have any account? Please Register</p>
                    <button>Register</button>
                </div>
                <div class="overlay-panel overlay-left">
                    <h1>Hello, You!</h1>
                    <p>Already have an account? <br>Let's Login</p>
                    <button>Log In</button>
                </div>
            </div>
            <button id="overlayBtn"></button>
        </div>
    </div>

    <!-- js code -->
    <script>
        const container = document.getElementById('container');
        const overlayCon = document.getElementById('overlayCon');
        const overlayBtn = document.getElementById('overlayBtn');

        overlayBtn.addEventListener('click', () => {
            container.classList.toggle('right-panel-active');

            overlayBtn.classList.remove('btnScaled');
            window.requestAnimationFrame(() => {
                overlayBtn.classList.add('btnScaled');
            })
        })
    </script>
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>

</body>

</html>
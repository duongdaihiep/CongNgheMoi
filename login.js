function login() {
    var username = document.getElementById('username').value;
    var password = document.getElementById('password').value;

    // Perform authentication logic (you may replace this with your server-side logic)
    if (username === 'demo' && password === 'password') {
        alert('Login successful!');
        $('#loginModal').modal('hide'); // Hide the modal on successful login
    } else {
        alert('Invalid username or password. Please try again.');
    }
}

function register() {
    var newUsername = document.getElementById('newUsername').value;
    var newPassword = document.getElementById('newPassword').value;

    // Perform registration logic (you may replace this with your server-side logic)
    alert('Registration successful for ' + newUsername + '!'); // Show a confirmation (you can replace this with a redirect or other action)
}

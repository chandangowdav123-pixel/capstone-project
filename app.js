function showRegister() {
    document.getElementById('login-form').classList.add('hidden');
    document.getElementById('register-form').classList.remove('hidden');
}

function showLogin() {
    document.getElementById('register-form').classList.add('hidden');
    document.getElementById('login-form').classList.remove('hidden');
}

function doRegister() {
    const name = document.getElementById('reg-name').value;
    const email = document.getElementById('reg-email').value;
    const password = document.getElementById('reg-password').value;

    fetch('php/register.php', {
        method: 'POST',
        headers: { 'Content-Type': 'application/x-www-form-urlencoded' },
        body: `name=${encodeURIComponent(name)}&email=${encodeURIComponent(email)}&password=${encodeURIComponent(password)}`
    })
    .then(res => res.json())
    .then(data => {
        if(data.status === 'success'){
            document.getElementById('reg-success').style.display = 'block';
            setTimeout(() => showLogin(), 2000);
        } else {
            document.getElementById('reg-error').innerText = data.message;
            document.getElementById('reg-error').style.display = 'block';
        }
    });
}

function doLogin() {
    const email = document.getElementById('login-email').value;
    const password = document.getElementById('login-password').value;

    fetch('php/login.php', {
        method: 'POST',
        headers: { 'Content-Type': 'application/x-www-form-urlencoded' },
        body: `email=${encodeURIComponent(email)}&password=${encodeURIComponent(password)}`
    })
    .then(res => res.json())
    .then(data => {
        if(data.status === 'success'){
            alert("Welcome, " + data.name);
            document.getElementById('page-login').classList.remove('active');
            document.getElementById('page-app').classList.add('active');
            document.getElementById('welcome-name').innerText = `Good morning, ${data.name}! 👋`;
        } else {
            document.getElementById('login-error').innerText = data.message;
            document.getElementById('login-error').style.display = 'block';
        }
    });
}

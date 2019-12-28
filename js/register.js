function generateKey() {
    var randomstring = Math.random().toString(36).slice(-8);
    document.getElementById('password').value = randomstring;
}
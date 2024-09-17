document.getElementById('data_nascimento').addEventListener('input', function(event) {
    var input = event.target;
    var value = input.value.replace(/\D/g, ''); 
    if (value.length >= 2) {
        value = value.slice(0, 2) + '/' + value.slice(2);
    }
    input.value = value;
});

document.getElementById('signo-form').addEventListener('submit', function(event) {
    var dataNascimento = document.getElementById('data_nascimento').value;
    var regex = /^(0[1-9]|[12][0-9]|3[01])\/(0[1-9]|1[0-2])$/;

    if (!regex.test(dataNascimento)) {
        alert('Por favor, insira uma data válida no formato dia/mês.');
        event.preventDefault();
    }
});

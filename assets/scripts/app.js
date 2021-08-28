$('.money-mask').maskMoney({prefix: 'R$', thousands: '.', decimal: ',', affixesStay: true});
$('.float-mask').maskMoney({decimal: '.', affixesStay: true});

$('.form-persist').on('submit', () => {
    $('.form-actions').addClass('d-none');
    $('.form-spinner').removeClass('d-none');
});
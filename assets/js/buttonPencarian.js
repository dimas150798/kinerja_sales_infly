$('#paket').each(function() {
    $(this).select2({
        placeholder: 'Pilih Paket',
        theme: 'bootstrap-5',
        dropdownParent: $(this).parent(),
    });
});

$('#branch_customer').each(function() {
    $(this).select2({
        placeholder: 'Pilih Area',
        theme: 'bootstrap-5',
        dropdownParent: $(this).parent(),
    });
});

$('#status_customer').each(function() {
    $(this).select2({
        placeholder: 'Pilih Status',
        theme: 'bootstrap-5',
        dropdownParent: $(this).parent(),
    });
});

$('#nama_sales').each(function() {
    $(this).select2({
        placeholder: 'Pilih Nama',
        theme: 'bootstrap-5',
        dropdownParent: $(this).parent(),
    });
});

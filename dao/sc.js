$(document).ready(function(){
    $('#eye').click(function(){
        $(this).toggleClass('open');
        $(this).children('i').toggleClass('fa-eye-slash fa-eye');
        if($(this).hasClass('open')){
            $(this).prev().attr('type', 'text');
        }else{
            $(this).prev().attr('type', 'password');
        }
    });
});
document.getElementById('addSizeButton').addEventListener('click', function() {
    // Tạo một ô input mới cho mảng size[]
    var newSizeInput = document.createElement('input');
    newSizeInput.type = 'text';
    newSizeInput.name = 'size[]';
    newSizeInput.id = 'size';
    newSizeInput.className = 'form-control';
    newSizeInput.placeholder = 'Nhập size';

    // Thêm ô input mới vào container
    document.getElementById('size-container').appendChild(newSizeInput);

    var newSoluongInput = document.createElement('input');
    newSoluongInput.type = 'text';
    newSoluongInput.name = 'soluong[]';
    newSoluongInput.id = 'size';
    newSoluongInput.className = 'form-control';
    newSoluongInput.placeholder = 'Nhập số lượng';

    // Thêm ô input mới vào container
    document.getElementById('soluong-container').appendChild(newSoluongInput);
});

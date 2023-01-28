// функция следит за прокруткой, и если мы прокрутили больше
// чем на 1 пиксели от начала окна браузера, то элементу с классом header 
// добавляем недавно созданный класс "header_fixed", который и фиксирует шапку в верхней области экрана.

$(function() {
  let header = $('.header');
  $(window).scroll(function() {
    if($(this).scrollTop() > 1) {
      header.addClass('header_fixed');
    } else {
      header.removeClass('header_fixed');
    }
  });
 });
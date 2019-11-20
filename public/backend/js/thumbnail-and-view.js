$('#list').click(function () {
  $('.showgrid').css('display', 'none');
  $('.showlist').css('display', 'block');
});

$('#grid').click(function () {
  $('.showlist').css('display', 'none');
  $('.showgrid').css('display', 'block');
});

// $(document).ready(function() {
//    	$('#list').click(function(event){event.preventDefault();$('#products .item').addClass('list-group-item');});
//     $('#grid').click(function(event){event.preventDefault();$('#products .item').removeClass('list-group-item');$('#products .item').addClass('grid-group-item');});
// });


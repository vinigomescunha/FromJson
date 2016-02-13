$.getJSON('info.json', function(data) {
    $('title').html(data.title);
    $('#title a b').html(data.title)
    $('footer .container .centered').append(' ' + data.footer);
});
clone = $('.cloned');
function loadjson() {
    $.getJSON('posts.json', function(data) {
        $('.cloned').remove();
        for (var i in data) {
            clone.clone().attr('id', 'id' + i).prependTo('#hd');
            $('#id' + i + ' h2').html(data[i].title);
            $('#id' + i + ' h3').html(data[i].content);
        }
    });
}
loadjson();
$('.form1').on('submit', function(e) {
    console.log('oI');
    e.preventDefault();
    var $i = $('.form1 :input,.form1 textarea'),
        vals = [];
    $i.each(function() {
        vals[this.name] = $(this).val();
    });

    $.get('generate.php?' + $.param($i), function(d) {
	loadjson();
        $('#plus').modal('hide');
    });
    $('.form1')[0].reset();
});

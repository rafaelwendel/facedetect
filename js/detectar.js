
$(function() {
    $('.imagem').load(function() {
        var $this = $(this);

        var coords = $this.faceDetection({
            complete:function() {
                $('#info').text('Face encontrada!');
            },
            error:function(img, code, message) {
                $('#info').text('error!');
                alert('Erro: '+message);
            }
        });
        for (var i = 0; i < coords.length; i++) {
            $('<div>', {
                'class':'face',
                'css': {
                    'position': 'absolute',
                    'left':     coords[i].positionX +'px',
                    'top':      coords[i].positionY +'px',
                    'width':    coords[i].width     +'px',
                    'height':   coords[i].height    +'px'
                }
            })
            .appendTo('#content');
        }
    });
    return false;
});

function showNotification(from, align, type, message){

    var icons;

    if (type == 'success'){
        icons = 'fas fa-check';
    } else if(type == 'danger'){
        icons = 'fas fa-exclamation-circle';
    } else if(type == 'warning'){
        icons = 'fas fa-exclamation-circle';
    }

    $.notify({
        icon: icons,
        message: message
    },{
        offset: {
            x: 20,
            y:100
        },
        type: type,
        delay: 5000,
        placement: {
            from: from,
            align: align
        }
    });
  }
jQuery(function($) {
    $(document).ready(function() {
        const openMobile = $('#openMobile')
        const mainMenu = $('#mainMenu')
        openMobile.on('click', function() {
            if(mainMenu.hasClass('active')){
                mainMenu.removeClass('active')
            }else{
                mainMenu.addClass('active')
            }
        })
    })
})
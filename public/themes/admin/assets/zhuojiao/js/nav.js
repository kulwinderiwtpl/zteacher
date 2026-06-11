//  左侧导航栏高亮显示
$(function () {
//      $(window).on('load',function(){
    $(".treeview1 .treeview-item").each(function () {
        if (this.href === window.location.href) {
            $(this).addClass('moren');
            $('.treeview1').addClass('is-expanded');
        }
    });

    $(".treeview2 .treeview-item").each(function () {
        if (this.href === window.location.href) {
            $(this).addClass('moren');
            $(".treeview2").addClass('is-expanded');
        }
    });

    $(".treeview3 .treeview-item").each(function () {
        if (this.href === window.location.href) {
            $(this).addClass('moren');
            $(".treeview3").addClass('is-expanded');
        }
    });

    $(".treeview4 .treeview-item").each(function () {
        if (this.href === window.location.href) {
            $(this).addClass('moren');
            $(".treeview4").addClass('is-expanded');
        }
    });

    /*$(".treeview5 .treeview-item").each(function () {
        if (this.href === window.location.href) {
            $(this).addClass('moren');
            $(".treeview5").addClass('is-expanded');
        }
    });*/
})
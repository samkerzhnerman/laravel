


$(document).on('click', '.reply-button', function(){
  if($(this).hasClass("disabled"))
      return false;
  var toggle = $(this).data('toggle');
  $("#"+toggle).fadeToggle('normal');
});

$(document).on('submit', '.laravelComment-form', function(){
    var thisForm = $(this);
    var parent = $(this).data('parent');
    var item_id = $(this).data('item');
    var comment = $('textarea#'+parent+'-textarea').val();
    var category = $(category_id).val();
    var post_title = $(posttitle).val();
    
    $.ajax({
         method: "get",
         url: "/laravellikecomment/comment/add",
         data: {parent: parent, comment: comment, item_id: item_id, category: category },
         dataType: "json"
      })
      .done(function(msg){
        $(thisForm).toggle('normal');
        var commentarii = msg.comment; 
        if (category == 2) commentarii = "Комментарий будет показан после одобрения модератором";
        var newComment = '<div class="comment" id="comment-'+msg.id+'" style="display: initial;"><a class="avatar"><img src="'+msg.userPic+'"></a><div class="content"><a class="author">'+msg.userName+'</a><div class="metadata"><span class="date">Только что</span></div><div class="text">'+commentarii+'</div><div class="actions"><a class="reply reply-button" data-toggle="'+msg.id+'-reply-form">Reply</a></div><form class="ui laravelComment-form form" id="'+msg.id+'-reply-form" data-parent="'+msg.id+'" data-item="'+item_id+'" style="display: none;"><div class="field"><textarea id="'+msg.id+'-textarea" rows="2"></textarea></div><input type="submit" class="ui basic small submit button" value="Ответить"></form></div><div class="ui threaded comments" id="'+item_id+'-comment-'+msg.id+'"></div></div>';

        $('#'+item_id+'-comment-'+parent).prepend(newComment);
        $('textarea#'+parent+'-textarea').val('');
      })
      .fail(function(msg){
        alert(msg);
      });

    return false;
});


$(document).on('click', '#showComment', function(){
    var show = $(this).data("show-comment");
   $('.show-'+$(this).data("item-id")+'-'+show).fadeIn('normal');
  $(this).data("show-comment", show+1);
   $(this).text("БОЛЬШЕ КОММЕНТАРИЕВ");
});


$(document).on('click', '#write-comment', function(){
    $($(this).data("form")).show();
});


<?php
$GLOBALS['commentDisabled'] = "";
if(!Auth::check())
    $GLOBALS['commentDisabled'] = "disabled";
$GLOBALS['commentClass'] = -1;
?>
<div class="laravelComment" id="laravelComment-{{ $comment_item_id }}">
    <h3 class="ui dividing header">Комментарии</h3>
    <div class="ui threaded comments" id="{{ $comment_item_id }}-comment-0">
        <button class="ui basic submit button" id="write-comment" data-form="#{{ $comment_item_id }}-comment-form">ОСТАВИТЬ КОММЕНТАРИЙ</button>
        <form class="ui laravelComment-form form" id="{{ $comment_item_id }}-comment-form" data-parent="0" data-item="{{ $comment_item_id }}" style="display: none;">
            <input type="hidden" id="category_id" name="category_id" value="{{ $comment_category_id }}">
            <div class="field">
                <textarea id="0-textarea" rows="2" {{ $GLOBALS['commentDisabled'] }}></textarea>
                @if(!Auth::check())
                    ПОЖАЛУЙСТА, ВОЙДИТЕ ДЛЯ ТОГО ЧТОБЫ ОСТАВЛЯТЬ КОММЕНТАРИИ!
                @endif
            </div>
            <input type="submit" class="ui basic small submit button" value="ОТПРАВИТЬ" {{ $GLOBALS['commentDisabled'] }}>
        </form>
<?php
$GLOBALS['commentVisit'] = array();

function dfs($comments, $comment){
    $GLOBALS['commentVisit'][$comment->id] = 1;
    $GLOBALS['commentClass']++;
?>
    <div class="comment show-{{ $comment->item_id }}-{{ (int)($GLOBALS['commentClass'] / 5) }}" id="comment-{{ $comment->id }}">
        <a class="avatar">
            <img src="{{ $comment->avatar }}">
        </a>
        <div class="content">
            <a class="author" url="{{ $comment->url or '' }}"> {{ $comment->name }} </a>
            <div class="metadata">
                <span class="date">{{ $comment->updated_at->diffForHumans() }}</span>
            </div>
            <div class="text">
                {{ $comment->comment }}
            </div>
            <div class="actions">
                <a class="{{ $GLOBALS['commentDisabled'] }} reply reply-button" data-toggle="{{ $comment->id }}-reply-form">Ответить</a>
            </div>
            {{ \risul\LaravelLikeComment\Controllers\CommentController::viewLike('comment-'.$comment->id) }}
            <form id="{{ $comment->id }}-reply-form" class="ui laravelComment-form form" data-parent="{{ $comment->id }}" data-item="{{ $comment->item_id }}" style="display: none;">
                <div class="field">
                    <textarea id="{{ $comment->id }}-textarea" rows="2" {{ $GLOBALS['commentDisabled'] }}></textarea>
                    @if(!Auth::check())
                        ПОЖАЛУЙСТА, ВОЙДИТЕ ДЛЯ ТОГО ЧТОБЫ ОСТАВЛЯТЬ КОММЕНТАРИИ!
                    @endif
                </div>
                <input type="submit" class="ui basic small submit button" value="Comment" {{ $GLOBALS['commentDisabled'] }}>
            </form>
        </div>
        <div class="comments" id="{{ $comment->item_id }}-comment-{{ $comment->id }}">
<?php
    foreach ($comments as $child) {
        if($child->parent_id == $comment->id && !isset($GLOBALS['commentVisit'][$child->id])){
            dfs($comments, $child);
        }
    }
    echo "</div>";
    echo "</div>";
}

$comments = \risul\LaravelLikeComment\Controllers\CommentController::getComments($comment_item_id);
foreach ($comments as $comment) {
    if(!isset($GLOBALS['commentVisit'][$comment->id])){
        dfs($comments, $comment);
    }
}
?>
    </div>
    <button class="ui basic button" id="showComment" data-show-comment="0" data-item-id="{{ $comment_item_id }}">ПОКАЗАТЬ КОММЕНТАРИИ</button>
    
    <script>  // var show = $('#showComment').data("show-comment");
    //$('.show-'+$('#showComment').data("item-id")+'-'+show).fadeIn('normal');
   // $('#showComment').data("show-comment", show+1);
    //$('#showComment').text("Show more"); 
    
    $('.laravelLike-icon').on('click', function(){
  if($(this).hasClass('disabled'))
    return false;

  var item_id = $(this).data('item-id');
  var vote = $(this).data('vote');

  $.ajax({
       method: "get",
       url: "/laravellikecomment/like/vote",
       data: {item_id: item_id, vote: vote},
       dataType: "json"
    })
    .done(function(msg){
      if(msg.flag == 1){
        if(msg.vote == 1){
          $('#'+item_id+'-like').removeClass('outline');
          $('#'+item_id+'-dislike').addClass('outline');
        }
        else if(msg.vote == -1){
          $('#'+item_id+'-dislike').removeClass('outline');
          $('#'+item_id+'-like').addClass('outline');
        }
        else if(msg.vote == 0){
          $('#'+item_id+'-like').addClass('outline');
          $('#'+item_id+'-dislike').addClass('outline');
        }
      $('#'+item_id+'-total-like').text(msg.totalLike == null ? 0 : msg.totalLike);
      $('#'+item_id+'-total-dislike').text(msg.totalDislike == null ? 0 : msg.totalDislike);
      }
    })
    .fail(function(msg){
      alert(msg);
    });
});
    
    
    </script>
</div>

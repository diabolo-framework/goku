/** 悟空 */
var goku = {};

/** 页面 */
goku.ui = {}
/** 对话框 */
goku.ui.dialog = {};
goku.ui.dialog.confirm = {};
/** 确认框触发 */
goku.ui.dialog.confirm._click = function() {
  $('#goku-dialog-confirm').modal('show');
  $('#goku-dialog-confirm-content').html($(this).attr('data-message'));
  $('#goku-dialog-confirm-yes-url').attr('href',$(this).attr('data-yes-url'));
};
/** 确认框初始化 */
goku.ui.dialog.confirm._init = function() {
  var triggers = $('[data-toggle="goku-dialog-confirm"]');
  for ( var i=0; i<triggers.length; i++ ) {
    triggers.eq(i).click(goku.ui.dialog.confirm._click);
  }
};

$(document).ready(function() {
  goku.ui.dialog.confirm._init();
});
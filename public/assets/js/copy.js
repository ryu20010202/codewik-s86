function onClickCopy() {
  // コピー対象のpタグオブジェクトを取得する.
  let pTag = document.getElementById('copyTarget');
  // コピー内容を選択する.
  let range = document.createRange();
  range.selectNodeContents(pTag);
  let selection = window.getSelection();
  selection.removeAllRanges();
  selection.addRange(range);
  // 選択したものをコピーする.
  document.execCommand('copy');
  // コピー内容の選択を解除する.
  selection.removeAllRanges();
}
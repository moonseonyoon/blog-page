function pagination(id, i) {
  const xhr = new XMLHttpRequest();
  xhr.open("GET", `ajax.php?id=${id}&offset=${i}`);

  xhr.addEventListener("load", () => {
    let comments_box = document.querySelector(".commentContainer");
    // comments_box.innerHTML = "";
    comments_box.innerHTML = xhr.responseText;
  });
  // PASS IN AN I
  // -> i is counting the number of comments
  // PASS IN AN ID
  // -> id is the article id
  xhr.send(null);
}

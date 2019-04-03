<section class="search_book">
  <form id="classification_form">
    <select name="classification">
      <option value="user_id">아이디</option>
      <option value="title">제목</option>
      <option value="description">내용</option>
    </select>
    <input name="value" placeholder="Press Enter" autocomplete="off" required>
    <button>검색</button>
  </form>
  <section class="extra_options">
    <p class="unactive_options">- extra Options -</p>
    <div class="active_options">
      <fieldset>
        <legend>- extra Options -</legend>
        <input type="radio" name="test" value="hello" id="test1"><label for="test1">h2ello</label>
        <input type="radio" name="test" id="test2"><label for="test2">sdf</label>
      </fieldset>
    </div>
  </section>
  </p>
  <a href="./index.php" class="full_list">[전체목록]</a></div>
  <section class="book_list">
    <ul class="lists">
      <li><p>No</p><p>title</p><p>date</p><p>writer</p></li>
      <?php require("./module/get_list.php"); ?>
    </ul>
    <div class="pages">
      <?php require('./module/get_pages.php'); ?>
    </div>
  </section>
</section>

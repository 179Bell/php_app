<!DOCTYPE html>
<html lang="ja">
<head>
    <?php include($values["layouts"]."meta.php"); ?>
</head>
<body>

<?php include($values["layouts"]."header.php"); ?>

    <main>
        <div class="container my-4">
            <div class="border p-4">
                <h5 class="mb-4">
                    新規投稿作成画面
                </h5>
                <form method="POST" action="store">
                    <fieldset>
                        <div class="form-group">
                            <label for="title">
                                タイトル
                            </label>
                            <input
                                id = "title"
                                name = "title"
                                class = "form-control"
                                values = "" 
                                type="text"
                                >
                        </div>
                        
                        <div class="form-group">
                            <label for="body">
                                本文
                            </label>
                            <textarea
                                id = "body"
                                name = "body"
                                class = "form-control"
                                rows = "10"
                                ></textarea>
                        </div>
                        
                        <div>
                            <a class = "btn btn-secondary" href="/">
                                キャンセルする
                            </a>

                            <button type ="submit" class="btn btn-primary">
                                投稿する
                            </button>
                        </div>
                    </fieldset>
                </form>
            </div>
        </div>
    </main>

    <?php include($values["layouts"]."footer.php"); ?>

</body>
</html>
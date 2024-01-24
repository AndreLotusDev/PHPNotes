<?php
    include_once("templates/header.php");

    //Get the current post if the req is a get and have and id to get the exact post
    $currentPost = null;

    if(isset($_GET['id'])){
        $postId = $_GET['id'];
        foreach($posts as $post){
            if($post['id'] == $postId){
                $currentPost = $post;
            }
        }
    }
?>
    <main id="post-container">
        <div class="content-container">
            <h1 id="main-title"><?= $currentPost['title'] ?></h1>
            <p id="post-description"><?= $currentPost['description'] ?></p>
            <div class="img-container">
                <img src="<?= $BASE_URL ?>/img/<?= $currentPost['img'] ?>" alt="<?= $currentPost['title'] ?>">
            </div>
            <p class="post-content">Lorem ipsum dolor sit amet consectetur adipisicing elit. Iusto blanditiis officia, distinctio recusandae tempore cumque placeat rerum temporibus nostrum saepe voluptatibus dignissimos itaque autem suscipit neque culpa perspiciatis totam incidunt!
            Animi dolorem autem natus sit voluptates, omnis blanditiis, veniam dignissimos temporibus vitae, eveniet odio voluptas voluptatem! Modi, possimus est assumenda velit quasi, in nobis, odit officia eum quo et non?
            Soluta iste quibusdam esse veritatis eligendi, quod natus quisquam ea voluptatem veniam velit nulla, porro blanditiis impedit incidunt modi illo pariatur fuga inventore facere! Culpa aliquid dolor impedit magni tenetur!
            Dolores rem repellendus minus excepturi ab aut suscipit quis minima architecto at molestias aspernatur, odit assumenda fugiat maxime quasi aliquid pariatur. Impedit, ad. Facilis provident delectus quibusdam dolore quidem minus.
            Odit ullam delectus dolorem tempore voluptatum porro omnis doloribus, vel laborum amet similique numquam id dolores possimus eos obcaecati nisi repellat quod hic? Tenetur dolores quos, rem obcaecati ullam a!</p>
        </div>

        <aside id="nav-container">
            <h3 id="tags-title">Tags</h3>
            <ul id="tag-list">
                <?php foreach($currentPost['tags'] as $tag): ?>
                <li><a href="#"><?= $tag ?></a></li>
                <?php endforeach; ?>
            </ul>
            <h3 id="categories-title">Categorias</h3>
            <ul id="categories-list">
                <?php foreach($categories as $category): ?>
                <li><a href="#"><?= $category ?></a></li>
                <?php endforeach; ?>
            </ul>
        </aside>
    </main>
<?php
    include_once("templates/footer.php");
?>
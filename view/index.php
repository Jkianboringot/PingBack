<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Create Post</title>
    <link rel="stylesheet" href="../css/main.css">
</head>
<body>

    <h2 style="text-align:center;">Create a New Post</h2>

    <!-- Post Form -->
    <form action="post_handler.php" method="POST">
        <div class="form-group">
            <label for="title">Post Title</label>
            <input type="text" name="title" id="title" placeholder="Enter post title" required>
        </div>

        <div class="form-group" style="margin-top: 15px;">
            <label for="content">Content</label>
            <textarea name="content" id="content" placeholder="Write your post here..." required></textarea>
        </div>

        <div class="form-row" style="margin-top: 15px;">
            <div class="form-group">
                <label for="category">Category</label>
                <select name="category" id="category" required>
                    <option value="">Select Category</option>
                    <option value="news">News</option>
                    <option value="tech">Tech</option>
                    <option value="lifestyle">Lifestyle</option>
                </select>
            </div>
            <div class="form-group">
                <label for="status">Status</label>
                <select name="status" id="status" required>
                    <option value="">Select Status</option>
                    <option value="draft">Draft</option>
                    <option value="published">Published</option>
                </select>
            </div>
        </div>

        <button type="submit">Publish Post</button>
        <div class="form-error" id="error-message"></div>
    </form>

    <!-- Example Table to Show Posts -->
    <div class="table">
        <h3>All Posts</h3>
        <table>
            <thead>
                <tr>
                    <th>ID</th>
                    <th>Title</th>
                    <th>Category</th>
                    <th>Status</th>
                    <th>Action</th>
                </tr>
            </thead>
            <tbody>
                <tr>
                    <td>1</td>
                    <td>My First Post</td>
                    <td>Tech</td>
                    <td>Published</td>
                    <td>
                        <button class="button">Edit</button>
                        <button class="button" style="background-color:#dc3545;">Delete</button>
                    </td>
                </tr>
                <tr>
                    <td>2</td>
                    <td>Another Post</td>
                    <td>Lifestyle</td>
                    <td>Draft</td>
                    <td>
                        <button class="button">Edit</button>
                        <button class="button" style="background-color:#dc3545;">Delete</button>
                    </td>
                </tr>
            </tbody>
        </table>
    </div>

</body>
</html>

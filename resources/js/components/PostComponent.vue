<template>
    <div class="container">
        <h2 class="heading">📝 Manage Your Posts</h2>

        <!-- Post Form -->
        <form :action="postRoute" method="POST" class="form">
            <input type="hidden" name="_token" :value="csrfToken" />
            <input
                type="text"
                name="title"
                placeholder="Enter Title"
                class="input"
                required
            />
            <textarea
                name="content"
                placeholder="Write Content..."
                class="textarea"
                required
            ></textarea>
            <button type="submit" class="button">
                ➕ Add Post
            </button>
        </form>

        <!-- Post List -->
        <div v-if="posts.length" class="post-list">
            <div
                v-for="post in posts"
                :key="post.id"
                class="post-item"
            >
                <h3 class="post-title">{{ post.title }}</h3>
                <p class="post-content">{{ post.content }}</p>
                <div class="post-actions">
                    <a :href="'/posts/' + post.id + '/edit'">
                        <button class="edit-button">
                            ✏️ Edit
                        </button>
                    </a>
                    <form :action="'/posts/' + post.id" method="POST">
                        <input type="hidden" name="_token" :value="csrfToken" />
                        <input type="hidden" name="_method" value="DELETE" />
                        <button type="submit" class="delete-button">
                            ❌ Delete
                        </button>
                    </form>
                </div>
            </div>
        </div>

        <p v-else class="no-posts">No posts available. Start adding new ones! </p>
    </div>
</template>

<script>
export default {
    props: {
        posts: {
            type: Array,
            required: true,
        },
    },
    data() {
        return {
            csrfToken: document.querySelector('meta[name="csrf-token"]').getAttribute("content"),
            postRoute: "/post",
        };
    },
};
</script>

<style scoped>
.container {
    max-width: 42rem;
    margin: 0 auto;
    padding: 1.5rem;
    background-color: #f3f4f6;
    min-height: 0vh;
}

.heading {
    font-size: 1.5rem;
    font-weight: 700;
    text-align: center;
    color: #1f2937;
    margin-bottom: 1.5rem;
}

.form {
    background-color: #ffffff;
    box-shadow: 0 4px 6px -1px rgba(0, 0, 0, 0.1);
    border-radius: 0.5rem;
    padding: 1rem;
    margin-bottom: 1.5rem;
}

.input,
.textarea {
    width: 100%;
    padding: 0.75rem;
    border: 1px solid #e5e7eb;
    border-radius: 0.5rem;
    margin-bottom: 0.75rem;
    outline: none;
    transition: box-shadow 0.2s;
}

.input:focus,
.textarea:focus {
    box-shadow: 0 0 0 2px #f472b6;
}

.button {
    width: 100%;
    background-color: #ec4899;
    color: #ffffff;
    font-weight: 700;
    padding: 0.5rem;
    border-radius: 0.5rem;
    transition: background-color 0.2s;
}

.button:hover {
    background-color: #db2777;
}

.post-list {
    display: flex;
    flex-direction: column;
    gap: 1rem;
}

.post-item {
    background-color: #ffffff;
    box-shadow: 0 4px 6px -1px rgba(0, 0, 0, 0.1);
    padding: 1rem;
    border-radius: 0.5rem;
    border-left: 4px solid #ec4899;
}

.post-title {
    font-size: 1.125rem;
    font-weight: 600;
    color: #111827;
}

.post-content {
    color: #374151;
    margin-top: 0.5rem;
}

.post-actions {
    display: flex;
    justify-content: flex-end;
    gap: 0.75rem;
    margin-top: 1rem;
}

.edit-button,
.delete-button {
    padding: 0.25rem 0.75rem;
    font-size: 0.875rem;
    border-radius: 0.375rem;
    transition: background-color 0.2s;
}

.edit-button {
    background-color: #3b82f6;
    color: #ffffff;
}

.edit-button:hover {
    background-color: #2563eb;
}

.delete-button {
    background-color: #ef4444;
    color: #ffffff;
}

.delete-button:hover {
    background-color: #dc2626;
}

.no-posts {
    text-align: center;
    color: #6b7280;
    margin-top: 1.5rem;
}
</style>
<template>
    <div class="container-fluid bg-dark mb-3">
        <div class="container">
            <nav class="navbar navbar-dark">
                <RouterLink :to="{name: 'home'}">
                    <span class="navbar-brand mb-0 h1">Vue Laravel SPA</span>
                </RouterLink>
                <div>
                    <RouterLink :to="{name: 'task.list'}">
                        <button class="btn btn-success">List</button>
                    </RouterLink>
                    <RouterLink :to="{name: 'task.create'}">
                        <button class="btn btn-success">ADD</button>
                    </RouterLink>
                </div>
            </nav>
        </div>
    </div>
</template>

<style scoped>
a {
    text-decoration: none;
}
</style>

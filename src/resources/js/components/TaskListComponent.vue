<script setup>
import { useFetch } from '@vueuse/core'
const res = useFetch('/api/tasks').json()
const { data: tasks } = res

const deleteTask = async taskId => {
    const { error } = await useFetch(`/api/tasks/${taskId}`).delete()
    if (error.value) {
        alert(error.value)
        return
    }

    const index = tasks.value.findIndex(t => t.id === taskId)
    const newTasks = tasks.value.toSpliced(index, 1)
    tasks.value = newTasks
}
</script>

<template>
    <div class="container">
        <table class="table table-hover">
            <thead class="thead-light">
                <tr>
                    <th scope="col">#</th>
                    <th scope="col">Title</th>
                    <th scope="col">Content</th>
                    <th scope="col">Person In Charge</th>
                    <th scope="col">Show</th>
                    <th scope="col">Edit</th>
                    <th scope="col">Delete</th>
                </tr>
            </thead>
            <tbody>
                <tr v-for="task in tasks" :key="task.id">
                    <th scope="row">{{ task.id }}</th>
                    <td>{{ task.title }}</td>
                    <td>{{ task.content }}</td>
                    <td>{{ task.person_in_change }}</td>
                    <td>
                        <RouterLink :to="{ name: 'task.detail', params: { taskId: task.id } }">
                            <button class="btn btn-primary">Show</button>
                        </RouterLink>
                    </td>
                    <td>
                        <RouterLink :to="{ name: 'task.edit', params: { taskId: task.id } }">
                            <button class="btn btn-success">Edit</button>
                        </RouterLink>
                    </td>
                    <td>
                        <button class="btn btn-danger" @click="deleteTask(task.id)">Delete</button>
                    </td>
                </tr>
            </tbody>
        </table>
    </div>
</template>

<script setup>
import { useFetch } from '@vueuse/core';
import { reactive, ref } from 'vue';
import { useRouter } from 'vue-router';

const task = reactive({})

const isSending = ref(false)
const error = ref(null)

const router = useRouter()

const onSubmit = async () => {
    isSending.value = true

    const res = await useFetch('/api/tasks').post(task)

    error.value = res.error.value
    if (error.value) {
        isSending.value = false
        return
    }

    router.push({ name: 'task.list' })
}
</script>

<template>
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-sm-6">
                <form @submit.prevent="onSubmit">
                    <div class="form-group row">
                        <label for="title" class="col-sm-3 col-form-label">Title</label>
                        <input type="text" class="col-sm-9 form-control" id="title" v-model="task.title">
                    </div>
                    <div class="form-group row">
                        <label for="content" class="col-sm-3 col-form-label">Content</label>
                        <input type="text" class="col-sm-9 form-control" id="content" v-model="task.content">
                    </div>
                    <div class="form-group row">
                        <label for="person-in-charge" class="col-sm-3 col-form-label">Person In Charge</label>
                        <input type="text" class="col-sm-9 form-control" id="person-in-charge"
                            v-model="task.person_in_change">
                    </div>
                    <button type="submit" class="btn btn-primary" :disabled="isSending">Submit</button>
                </form>
                <div v-if="error">
                    {{ error }}
                </div>
            </div>
        </div>
    </div>
</template>

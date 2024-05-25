<script setup>
import DangerButton from '@/Components/DangerButton.vue';
import InputError from '@/Components/InputError.vue';
import InputLabel from '@/Components/InputLabel.vue';
import Modal from '@/Components/Modal.vue';
import SecondaryButton from '@/Components/SecondaryButton.vue';
import TextInput from '@/Components/TextInput.vue';
import { useForm } from '@inertiajs/vue3';
import { nextTick, ref, watchEffect } from 'vue';

const confirmingUserDeletion = ref(false);
const passwordInput = ref(null);

const props = defineProps({
    selectedId: Object,
});

const form = useForm({
    id: '',
    password: '',
});

const confirmUserDeletion = () => {
    confirmingUserDeletion.value = true;
    form.id = props.selectedId;
};

const deleteBulk = () => {
    form.post(route('user.destroy-bulk'), {
        preserveScroll: true,
        onSuccess: () => {
            closeModal();
        },
    });
};

const closeModal = () => {
    confirmingUserDeletion.value = false;
    props.selectedId.length = 0;
    form.reset();
};
</script>

<template>
    <section class="">
        <span class="font-semibold text-slate-300 me-2 text-sm"
            >{{ props.selectedId.length }} selected</span
        >
        <DangerButton @click="confirmUserDeletion" class="py-2.5">
            Delete Selected
        </DangerButton>
        <Modal :show="confirmingUserDeletion" @close="closeModal">
            <div class="p-6">
                <h2
                    class="text-lg font-medium text-gray-900 dark:text-slate-200"
                >
                    Are you sure you want to delete?
                </h2>

                <p class="mt-1 text-sm text-gray-600 dark:text-slate-200">
                    Once your data is deleted, all of its resources and data
                    will be permanently deleted. Please enter your password to
                    confirm you would like to permanently delete.
                </p>

                <div class="mt-6">
                    <InputLabel
                        for="password"
                        value="Password"
                        class="sr-only"
                    />

                    <TextInput
                        id="password"
                        ref="passwordInput"
                        v-model="form.password"
                        type="password"
                        class="mt-1 block w-3/4"
                        placeholder="Password"
                        @keyup.enter="deleteBulk"
                    />

                    <InputError :message="form.errors.password" class="mt-2" />
                </div>

                <div class="mt-6 flex justify-end">
                    <SecondaryButton @click="closeModal">
                        Cancel
                    </SecondaryButton>

                    <DangerButton
                        class="ms-3"
                        :class="{ 'opacity-25': form.processing }"
                        :disabled="form.processing"
                        @click="deleteBulk"
                    >
                        Delete Account
                    </DangerButton>
                </div>
            </div>
        </Modal>
    </section>
</template>

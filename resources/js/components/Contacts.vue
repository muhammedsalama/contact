<template>
    <div>
        <h1>Contacts</h1>

        <form action="#" @submit.prevent="edit ? updateContact(contact.id) : createContact()">
            <div class="form-group">
                <label for="contact">Name</label>
                <input v-model="contact.name" id="contact" type="text" name="name" class="form-control">
            </div>
            <div class="form-group">
                <label for="email">Email</label>
                <input v-model="contact.email" id="email" type="email" name="email" class="form-control">
            </div>
            <div class="form-group">
                <label for="phone">Phone</label>
                <input v-model="contact.phone" id="phone" type="number" name="phone" class="form-control">
            </div>

            <div class="form-group">
                <button v-show="!edit" type="submit" class="btn btn-success">New Contact</button>
                <button v-show="edit" type="submit" class="btn btn-success">Edit Contact</button>
            </div>

        </form>

    </div>
</template>

<script>
    export default {
        data: function () {
            return {
                edit: true,
                list: [],
                contact: {
                    id: '',
                    name: '',
                    email: '',
                    phone: ''
                }
            }
        },
        mounted: function () {
            console.log('Contacts Component loaded..');
        },

        methods: {
            createContact: function () {
                console.log('Creating Contact..');
                return;
            },

            updateContact: function (id) {
                console.log('Updating Contact '+id+'..');
                return;
            }

        }
    }
</script>


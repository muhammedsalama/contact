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
                edit: false,
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
            this.fetchContactList();
        },

        methods: {
            fetchContactList: function () {
                console.log('Fetching contacts ..');
                axios.get('api/contacts')
                    .then((response) => {
                        console.log(response.data)
                        this.list = response.data
                    }).catch((error) => {
                    console.log(error)
                })
            },

            createContact: function () {
                console.log('Creating Contact..');

                axios.post('api/contact/create', Object.assign({}, this.contact))
                    .then(() => {
                        this.contact.name = '';
                        this.contact.email = '';
                        this.contact.phone = '';
                        this.edit = false;
                        this.fetchContactList();
                    }).catch((error) => {
                    console.log(error)
                })
                return;
            },

            updateContact: function (id) {
                console.log('Updating Contact ' + id + '..');
                return;
            }

        }
    }
</script>


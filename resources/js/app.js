require('./bootstrap');

import { createApp, h, vue } from 'vue';
import { createInertiaApp, Link, Head } from '@inertiajs/inertia-vue3';
import { InertiaProgress } from '@inertiajs/progress';
import BreezeAuthenticatedLayout from "@/Layouts/AuthenticatedLayout.vue";
import Table from "@/Components/Table/Table.vue";
import TH from "@/Components/Table/TH.vue";
import TD from "@/Components/Table/TD.vue";
import Button from "@/Components/Shared/Button.vue";
import BanerHeading from "@/Components/Shared/BanerHeading.vue";
import Notifications from "@/Components/Notifications.vue";
import Form from "@/Components/Form/Form.vue";
import TextField from "@/Components/Form/TextField.vue";
import SelectField from "@/Components/Form/SelectField.vue";
import Pagination from "@/Components/Shared/Pagiantion.vue";
import ConfirmModel from "@/Components/Shared/ConfirmModel.vue";
import CreateAccountPopup from "@/Components/Shared/CreateAccountPopup.vue";
import { ChevronDownIcon } from "@heroicons/vue/solid";
import { Menu, MenuButton, MenuItem, MenuItems, Dialog, DialogPanel, DialogTitle, TransitionChild, TransitionRoot } from "@headlessui/vue";
import route from "ziggy-js";
import axios from "axios";
import { ExclamationIcon } from "@heroicons/vue/outline";

import Alpine from 'alpinejs'
window.Alpine = Alpine
Alpine.start()

const appName = window.document.getElementsByTagName('title')[0]?.innerText || 'Laravel';

createInertiaApp({
    title: (title) => `${title} - ${appName}`,
    resolve: (name) => require(`./Pages/${name}.vue`),
    setup({ el, app, props, plugin, Maska }) {
        return createApp({ render: () => h(app, props) })
            .use(Maska)
            .use(plugin)
            .component('Link', Link)
            .component('Head', Head)
            .component('BreezeAuthenticatedLayout', BreezeAuthenticatedLayout)
            .component('Notifications', Notifications)
            .component('BanerHeading', BanerHeading)
            .component('Button', Button)
            .component('TD', TD)
            .component('TH', TH)
            .component('Table', Table)
            .component('Form', Form)
            .component('TextField', TextField)
            .component('SelectField', SelectField)
            .component('Pagination', Pagination)
            .component('ConfirmModel', ConfirmModel)
            .component('CreateAccountPopup', CreateAccountPopup)
            .component('ChevronDownIcon', ChevronDownIcon)
            .component('Menu', Menu)
            .component('MenuButton', MenuButton)
            .component('MenuItem', MenuItem)
            .component('MenuItems', MenuItems)
            .component('Dialog', Dialog)
            .component('DialogPanel', DialogPanel)
            .component('DialogTitle', DialogTitle)
            .component('TransitionChild', TransitionChild)
            .component('TransitionRoot', TransitionRoot)
            .component('route', route)
            .component('axios', axios)
            .component('ExclamationIcon', ExclamationIcon)
            .mixin({ methods: { route } })
            .mount(el);
    },
});

InertiaProgress.init({ color: '#4B5563' });

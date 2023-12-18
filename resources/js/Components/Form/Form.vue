<template>
    <div class="shadow overflow-hidden sm:rounded-md">
        <div class="px-4 py-5 bg-white sm:p-6">
            <div class="grid grid-cols-6 gap-6">
                <slot name="textfield"></slot>
                <slot name="selectfield"></slot>
                <slot name="submitbutton"></slot>   
            </div>
        </div>
    </div>      
</template>
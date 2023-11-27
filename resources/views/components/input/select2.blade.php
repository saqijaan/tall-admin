<div class="{{ $attributes->merge(['class' => 'w-full flex flex-col items-center mx-auto'])->only('class') }}" x-data="{
    options: [],
    selected: @entangle($attributes->wire('model')),
    show: false,
    open() {
        this.show = true
    },
    close() {
        this.show = false
    },
    isOpen() {
        return this.show === true
    },
    select(index, event) {
        if (!this.options[index].selected) {
            this.options[index].selected = true;
            this.options[index].element = event.target;
            this.selected.push(this.options[index].value);

        } else {
            this.selected.splice(this.selected.lastIndexOf(index), 1);
            this.options[index].selected = false
        }
    },
    remove(option, index) {
        option.selected = false;
        {{-- this.options[index].selected = false; --}}
        this.selected.splice(index, 1);
    },
    loadOptions() {
        const options = this.$refs.select.options;
        for (let i = 0; i < options.length; i++) {
            this.options.push({
                value: options[i].value,
                text: options[i].innerText,
                selected: options[i].getAttribute('selected') != null ? options[i].getAttribute('selected') : false
            });
        }
    },
    selectedValues() {
        return this.selected.map((option, index) => {
            return this.options[index].value;
        })
    },
    selectedOptions() {
        return this.options.filter((option) => {
            return option.selected;
        })
    }
}" x-init="loadOptions()">

    <select x-ref="select" class="hidden">
        {{ $slot }}
    </select>
    <div class="inline-block relative w-full">
        <div class="flex flex-col items-center relative">
            <div class="w-full" x-on:click="open">
                <div class="my-2 p-1 flex border border-gray-200 bg-white rounded">
                    <div class="flex flex-auto flex-wrap">
                        <template x-for="(option,index) in selectedOptions" :key="option.value">
                            <div class="flex justify-center items-center m-1 font-medium py-1 px-2 bg-white rounded-full text-teal-700 bg-teal-100 border border-teal-300 ">
                                <div class="text-xs font-normal leading-none max-w-full flex-initial" x-text="option.text"></div>
                                <div class="flex flex-auto flex-row-reverse">
                                    <div x-on:click="remove(option, index)">
                                        <svg class="fill-current h-6 w-6 " role="button" viewBox="0 0 20 20">
                                            <path d="M14.348,14.849c-0.469,0.469-1.229,0.469-1.697,0L10,11.819l-2.651,3.029c-0.469,0.469-1.229,0.469-1.697,0
                                           c-0.469-0.469-0.469-1.229,0-1.697l2.758-3.15L5.651,6.849c-0.469-0.469-0.469-1.228,0-1.697s1.228-0.469,1.697,0L10,8.183
                                           l2.651-3.031c0.469-0.469,1.228-0.469,1.697,0s0.469,1.229,0,1.697l-2.758,3.152l2.758,3.15
                                           C14.817,13.62,14.817,14.38,14.348,14.849z" />
                                        </svg>

                                    </div>
                                </div>
                            </div>
                        </template>
                        <div class="flex-1" x-show="selected.length== 0">
                            <input class="bg-transparent p-1 px-2 appearance-none outline-none h-full w-full text-gray-800" placeholder="Select a option" x-bind:value="selectedValues()">
                        </div>
                    </div>

                    {{-- Open close arrows --}}
                    <div class="text-gray-300 w-8 py-1 pl-2 pr-1 border-l flex items-center border-gray-200">
                        <button class="cursor-pointer w-6 h-6 text-gray-600 outline-none focus:outline-none" type="button" x-show="isOpen() === true" x-on:click="open">
                            <svg class="fill-current h-4 w-4" version="1.1" viewBox="0 0 20 20">
                                <path d="M17.418,6.109c0.272-0.268,0.709-0.268,0.979,0s0.271,0.701,0,0.969l-7.908,7.83 c-0.27,0.268-0.707,0.268-0.979,0l-7.908-7.83c-0.27-0.268-0.27-0.701,0-0.969c0.271-0.268,0.709-0.268,0.979,0L10,13.25 L17.418,6.109z" />
                            </svg>
                        </button>
                        <button class="cursor-pointer w-6 h-6 text-gray-600 outline-none focus:outline-none" type="button" x-show="isOpen() === false" @click="close">
                            <svg class="fill-current h-4 w-4" viewBox="0 0 20 20">
                                <path d="M2.582,13.891c-0.272,0.268-0.709,0.268-0.979,0s-0.271-0.701,0-0.969l7.908-7.83 c0.27-0.268,0.707-0.268,0.979,0l7.908,7.83c0.27,0.268,0.27,0.701,0,0.969c-0.271,0.268-0.709,0.268-0.978,0L10,6.75L2.582,13.891z" />
                            </svg>
                        </button>
                    </div>
                </div>
            </div>

            {{-- Dropdown --}}
            <div class="w-full px-4">
                <div class="absolute shadow top-100 bg-white z-40 w-full left-0 rounded max-h-select overflow-y-auto svelte-5uyqqj" x-show.transition.origin.top="isOpen()" x-on:click.away="close">
                    <div class="flex flex-col w-full">
                        <template x-for="(option,index) in options" :key="index">
                            <div>
                                <div class="cursor-pointer w-full border-gray-100 rounded-t border-b hover:bg-teal-100" @click="select(index,$event)">
                                    <div class="flex w-full items-center p-2 pl-2 border-transparent border-l-2 relative" x-bind:class="option.selected ? 'border-teal-600' : ''">
                                        <div class="w-full items-center flex">
                                            <div class="mx-2 leading-6" x-model="option" x-text="option.text"></div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </template>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

import { Livewire, Alpine } from '@vendor/livewire/livewire/dist/livewire.esm';

import tallTheme from './theme'
import focusTrap from './focus-trap';

window.focusTrap = focusTrap;
window.tallTheme = tallTheme;

Alpine.data('themeData', tallTheme);

Livewire.start()
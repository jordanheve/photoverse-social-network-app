import './bootstrap';
import * as FilePond from 'filepond';
import 'filepond/dist/filepond.min.css';
import Swal from 'sweetalert2';
 // Import the plugin code
import FilePondPluginImagePreview from 'filepond-plugin-image-preview';

// Import the plugin styles
import 'filepond-plugin-image-preview/dist/filepond-plugin-image-preview.css';
FilePond.registerPlugin(FilePondPluginImagePreview);
window.FilePond = FilePond;
window.Swal = Swal;



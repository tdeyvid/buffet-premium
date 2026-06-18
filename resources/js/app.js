import './bootstrap';

import Alpine from 'alpinejs';
import Swal from 'sweetalert2';
import 'bootstrap';

import AOS from 'aos';
import 'aos/dist/aos.css';

import Chart from 'chart.js/auto';

window.Alpine = Alpine;
window.Swal = Swal;

Alpine.start();

AOS.init();

const input = document.querySelector('[name="imagem[]"]');

if (input) {

    input.addEventListener('change', function () {

        const preview = document.getElementById('preview');

        if (!preview) return;

        preview.innerHTML = '';

        [...this.files].forEach(file => {

            const reader = new FileReader();

            reader.onload = e => {

                preview.innerHTML += `

                <div class="col-md-3">

                    <img
                        src="${e.target.result}"
                        class="img-fluid rounded-4"
                        style="
                            height:200px;
                            width:100%;
                            object-fit:cover;
                        ">

                </div>

                `;

            };

            reader.readAsDataURL(file);

        });

    });

}

const grafico = document.getElementById('grafico');

if (grafico) {

    new Chart(grafico, {

        type: 'bar',

        data: {

            labels: [

                'Produtos',
                'Categorias',
                'Reservas',
                'Galeria'

            ],

            datasets: [{

                label: 'Sistema',

                data: [

                    window.totalProdutos || 0,
                    window.totalCategorias || 0,
                    window.totalReservas || 0,
                    window.totalGaleria || 0

                ]

            }]

        }

    });

}
/**
 *
 *
 * PROHIBIDO TOCAR
 *
 *
 */

function updateClock() {
    const months = ['enero', 'febrero', 'marzo', 'abril', 'mayo', 'junio', 'julio', 'agosto', 'septiembre',
        'octubre', 'noviembre', 'diciembre'
    ];
    const days = ['domingo', 'lunes', 'martes', 'miércoles', 'jueves', 'viernes', 'sábado'];

    const now = new Date();
    const day = days[now.getDay()];
    const date = now.getDate();
    const month = months[now.getMonth()];
    const year = now.getFullYear();
    const hour = now.getHours().toString().padStart(2, '0');
    const minute = now.getMinutes().toString().padStart(2, '0');
    const second = now.getSeconds().toString().padStart(2, '0');

    const dateString =
        `Gráficos Dinámicos — Mapa de Colocación | ${day}, ${date} de ${month} del ${year} ${hour}:${minute}:${second}`;
    document.getElementById('date').textContent = dateString;
}
setInterval(updateClock, 1000);

/**
 *
 *
 * /PROHIBIDO TOCAR
 *
 *
 */

const ctx = document.getElementById("mapa-colocacion");

new Chart(ctx, {
  type: "bar",
  data: {
    labels: ["Global Re", "Latina Seguros", "QBE Ecuador", "Chubb", "Reaseguradora del Ecuador", "Agnew"],
    datasets: [
      {
        label: "Reaseguradores",
        data: [50, 10, 7.50, 9, 15, 9],
        borderWidth: 1,
        backgroundColor: [
          "rgba(255, 99, 132, 0.2)",
          "rgba(255, 159, 64, 0.2)",
          "rgba(255, 205, 86, 0.2)",
          "rgba(75, 192, 192, 0.2)",
          "rgba(54, 162, 235, 0.2)",
          "rgba(153, 102, 255, 0.2)"
        ],
        borderColor: [
          "rgb(255, 99, 132)",
          "rgb(255, 159, 64)",
          "rgb(255, 205, 86)",
          "rgb(75, 192, 192)",
          "rgb(54, 162, 235)",
          "rgb(153, 102, 255)"
        ]
      }
    ]
  },
  options: {
    scales: {
      y: {
        beginAtZero: true
      }
    }
  }
});

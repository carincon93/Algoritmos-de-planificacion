<x-guest-layout>
    @push('scripts')
        <script type="text/javascript">
            google.charts.load('current', {
                'packages': ['gantt']
            });
            google.charts.setOnLoadCallback(drawChart);

            function toMilliseconds(minutes) {
                return minutes * 60 * 1000;
            }

            function drawChart() {
                var otherData = new google.visualization.DataTable();
                otherData.addColumn("string", "Task ID");
                otherData.addColumn("string", "Task Name");
                otherData.addColumn("string", "Resource");
                otherData.addColumn("date", "Start");
                otherData.addColumn("date", "End");
                otherData.addColumn("number", "Duration");
                otherData.addColumn("number", "Percent Complete");
                otherData.addColumn("string", "Dependencies");

                @foreach ($procesos as $key => $proceso)
                    @if ($key == 0)
                        otherData.addRows([
                            [
                                '{{ $proceso->id }}',
                                '{{ $proceso->nombre }}',
                                '{{ $proceso->id }}',
                                null,
                                null,
                                toMilliseconds({{ $proceso->duracion }}),
                                100,
                                null,
                            ]
                        ]);
                    @else
                        otherData.addRows([
                            [
                                '{{ $proceso->id }}',
                                '{{ $proceso->nombre }}',
                                '{{ $proceso->id }}',
                                null,
                                null,
                                toMilliseconds({{ $proceso->duracion }}),
                                100,
                                "{{ $procesos[$key - 1]['id'] }}",
                            ]
                        ]);
                    @endif
                @endforeach

                let trackHeight = 120;

                var options = {
                    height: {{ count($procesos) + 2 }} * trackHeight,
                    gantt: {
                        defaultStartDate: new Date(2022, 9, 24),
                    },
                };

                var chart = new google.visualization.Gantt(document.getElementById('chart_div'));

                chart.draw(otherData, options);
            }
        </script>
    @endpush

    <h1 class="font-black m-10 text-center">Prioridad</h1>

    <div class="flex items-center justify-center my-6">
        <a href="/" class="m-auto underline">Volver atrás</a>
    </div>

    <div class="flex items-center justify-center">
        <strong class="mr-2">Tiempo promedio de espera: </strong> {{ $promedioEspera }}
        <strong class="mx-2">Tiempo promedio de retorno: </strong> {{ $promedioRetorno }}
    </div>

    <div id="chart_div"></div>
</x-guest-layout>

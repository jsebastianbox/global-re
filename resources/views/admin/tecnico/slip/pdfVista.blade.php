@include('admin.tecnico.slip.pdf-generales.baseData')
@switch($slip->type_coverage)
@case('1')
@case('2')

@case('3')
@case('4')
@include('admin.tecnico.slip.pdf-slips-types.life')
@break

@case('5')
@case('6')
@case('7')
@case('8')
@include('admin.tecnico.slip.pdf-slips-types.fire')
@break

@case('9')
@case('10')
@include('admin.tecnico.slip.pdf-slips-types.livianos')
@break;
@case('11')
@case('12')

@case('13')
@case('14')

@case('15')
@case('16')

@case('17')
@include('admin.tecnico.slip.pdf-slips-types.equipoElectronico')
@break

@case('18')
@case('19')

@case('20')
@include('admin.tecnico.slip.pdf-slips-types.petrolero')
@break
@case('21')
@case('22')
@include('admin.tecnico.slip.pdf-slips-types.casco')
@break

@case('23')
@include('admin.tecnico.slip.pdf-slips-types.proteccion')
@break

@case('24')
@case('25')

@case('26')
@include('admin.tecnico.slip.pdf-slips-types.portuaria')
@break

@case('27')
@case('28')

@case('29')
@case('30')

@case('31')
@include('admin.tecnico.slip.pdf-slips-types.interno')
@break

@case('32')
@case('33')
@include('admin.tecnico.slip.pdf-slips-types.cascoAereo')
@break

@case('34')
@include('admin.tecnico.slip.pdf-slips-types.licencia')
@break

@case('35')
@case('36')

@case('37')
@include('admin.tecnico.slip.pdf-slips-types.aviacion') {{-- SLIP PENDIENTE --}}
@break

@case('38')
@case('39')

@case('40')
@case('41')

@case('42')
@include('admin.tecnico.slip.pdf-slips-types.responsabilidadCivil')
@break

@case('43')
@include('admin.tecnico.slip.pdf-slips-types.directores')
@break

@case('44')
@case('45')
@include('admin.tecnico.slip.pdf-slips-types.bankers')
@break

@case('46')
@include('admin.tecnico.slip.pdf-slips-types.fidelidad')
@break

@case('47')
@case('48')
@case('49')
@case('50')
@case('51')
@case('52')
@include('admin.tecnico.slip.pdf-slips-types.fianzas')
@break

@default
@endswitch


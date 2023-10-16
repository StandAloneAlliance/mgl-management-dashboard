@extends('layouts.admin')
@section('content')
@include('partials.sidebar')
<div class="container">
    <div class="row">
        <div class="col-6 mt-5">
            <a href="{{ route('admin.customers.create')}}" class="btn btn-primary">Aggiungi corsista</a>
            <div class="table-widget">
                <table>
                    <caption>
                        Corsisti
                        <span class="table-row-count"></span>
                    </caption> 
                    <thead>
                        <tr>
                            <th>Nome e Cognome</th>
                            <th>C.F.</th>
                            <th>Email</th>
						    <th>Mansione</th>
                        </tr>
                    </thead>
                    <tbody id="team-member-rows">
                        <!--? rows are generated -->
                    </tbody>
                    <tfoot>
                        <tr>
                            <td colspan="4">
                                <ul class="pagination">
                                    <!--? generated pages -->
                                </ul>
                            </td>
                        </tr>
                    </tfoot>
                </table>
            </div>
        </div>
    </div>
</div>

    <script src="https://cdn.jsdelivr.net/npm/vanillajs@1.0/dest/cjs/index.min.js"></script>
    <script>
        const teamMembers = @json($customers);
        let tableRowCount = document.getElementsByClassName('table-row-count');
        tableRowCount[0].innerHTML = `(${teamMembers.length}) Members`;
        console.log(tableRowCount)

        let tableBody = document.getElementById('team-member-rows');

        const itemsOnPage = 5;

        const numberOfPages = Math.ceil(teamMembers.length / itemsOnPage);

        const start = (new URLSearchParams(window.location.search)).get('page') || 1;

        const mappedRecords = teamMembers
        .filter((teamMember, i) => (((start - 1) * itemsOnPage) < i + 1) && (i+1 <= start * itemsOnPage))
        .map(
        (teamMember) => {
            return 
            `<tr>
                <td class="team-member-profile">
                    <img src="${teamMember.cover_image}" alt="${teamMember.name}">
                    <span class="profile-info">
                        <span class="profile-info__name">
                            ${teamMember.name} ${teamMember.surname}
                        </span>
                    </span>
                </td>
                <td>
                    <span class="status">
                        ${teamMember.crf}
                    </span>
                </td>
                <td>${teamMember.email}</td>
                <td>
                    <span class="tasks">
                        <span class="tag">${teamMember.task}</span>
                    </span>        
                </td>
            </tr>`;
        });

        tableBody.innerHTML = mappedRecords.join('');

        const pagination = document.querySelector('.pagination');

        const linkList = [];

        for (let i = 0; i < numberOfPages; i++) {
            const pageNumber = i + 1;
            
            console.log(pageNumber, start)

            linkList.push(`<li><a href="?page=${pageNumber}" ${pageNumber == start ? 'class="active"' : ''} title="page ${pageNumber}">${pageNumber}</a></li>`);
        }

        pagination.innerHTML = linkList.join('');
    </script>

@endsection

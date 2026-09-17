@extends('layouts.app')

@section('content')

<div class="container py-4">

    <div class="mb-4">
        <h4 class="mb-1">Nova movimentação</h4>
        <p class="text-muted mb-0">Cadastre uma entrada ou saída.</p>
    </div>

    <div class="card border-0 shadow-sm">
        <div class="card-body p-4">

            <form action="{{ route('movimentacoes.store') }}" method="POST">
                @csrf

                <div class="row g-3">

                    {{-- Pessoa --}}
                    <div class="col-md-6">
                        <label class="form-label">Pessoa</label>
                        <select name="pessoa_id" class="form-select" required>
                            <option value="">Selecione...</option>

                            @foreach ($pessoas as $pessoa)
                                <option value="{{ $pessoa->id }}">
                                    {{ $pessoa->nome }}
                                </option>
                            @endforeach
                        </select>
                    </div>

                    {{-- Data --}}
                    <div class="col-md-6">
                        <label class="form-label">Data</label>
                        <input
                            type="date"
                            name="data"
                            class="form-control"
                            value="{{ date('Y-m-d') }}"
                            required
                        >
                    </div>

                    {{-- Descrição --}}
                    <div class="col-md-8">
                        <label class="form-label">Descrição</label>
                        <input
                            type="text"
                            name="descricao"
                            class="form-control"
                            placeholder="Ex.: Salário mensal"
                            required
                        >
                    </div>

                    {{-- Tipo --}}
                    <div class="col-md-4">
                        <label class="form-label">Tipo</label>
                        <select name="tipo" class="form-select" required>
                            <option value="">Selecione...</option>
                            <option value="entrada">Entrada</option>
                            <option value="saida">Saída</option>
                        </select>
                    </div>

                    {{-- Valor --}}
                    <div class="col-md-4">
                        <label class="form-label">Valor</label>
                        <div class="input-group">
                            <span class="input-group-text">R$</span>
                            <input
                                type="number"
                                name="valor"
                                class="form-control"
                                step="0.01"
                                min="0"
                                placeholder="0,00"
                                required
                            >
                        </div>
                    </div>

                </div>

                <div class="d-flex justify-content-end gap-2 mt-4">
                    <a href="{{ route('movimentacoes.index') }}"
                       class="btn btn-light">
                        Cancelar
                    </a>

                    <button type="submit" class="btn btn-primary px-4">
                        Salvar
                    </button>
                </div>

            </form>

        </div>
    </div>

</div>

@endsection

document.addEventListener('DOMContentLoaded', () => {
    const modal = document.getElementById('detailModal');
    const modalBody = document.getElementById('modalBody');
    const deleteForm = document.getElementById('deleteForm');
    const closeBtn = document.querySelector('.modal-close');

    // 「詳細」ボタンがクリックされた時
    document.querySelectorAll('.btn-detail').forEach(button => {
        button.addEventListener('click', async () => {
            const contactId = button.dataset.id;

            try {
                const response = await fetch(`/admin/${contactId}`);
                const data = await response.json();

                // modalBody.innerHTML = `
                //     <dl>
                //         <dt>お名前</dt>
                //         <dd>${data.last_name} ${data.first_name}</dd>
                //         <dt>性別</dt>
                //         <dd>${formatGender(data.gender)}</dd>
                //         <dt>メールアドレス</dt>
                //         <dd>${data.email}</dd>
                //         <dt>住所</dt>
                //         <dd>${data.address}</dd>
                //         <dt>建物名</dt>
                //         <dd>${data.building ?? '-'}</dd>
                //         <dt>お問い合わせの種類</dt>
                //         <dd>${data.category?.content ?? '-'}</dd>
                //         <dt>お問い合わせ内容</dt>
                //         <dd>${data.detail}</dd>
                //     </dl>
                // `;
                modalBody.innerHTML = `
    <dl class="modal-table">
        <div class="modal-row"><dt>お名前</dt><dd>${data.last_name} ${data.first_name}</dd></div>
        <div class="modal-row"><dt>性別</dt><dd>${formatGender(data.gender)}</dd></div>
        <div class="modal-row"><dt>メールアドレス</dt><dd>${data.email}</dd></div>
        <div class="modal-row"><dt>電話番号</dt><dd>${data.tel}</dd></div>
        <div class="modal-row"><dt>住所</dt><dd>${data.address}</dd></div>
        <div class="modal-row"><dt>建物名</dt><dd>${data.building ?? '-'}</dd></div>
        <div class="modal-row"><dt>お問い合わせの種類</dt><dd>${data.category?.content ?? '-'}</dd></div>
        <div class="modal-row">
            <dt>お問い合わせ内容</dt>
            <dd>${data.detail}</dd>
        </div>
    </dl>
`;



                deleteForm.action = `/admin/${data.id}`;

                modal.style.display = 'flex';
            } catch (err) {
                alert('詳細の取得に失敗しました。');
            }
        });
    });

    // モーダルを閉じる
    closeBtn.addEventListener('click', () => {
        modal.style.display = 'none';
    });

    // モーダル外をクリックしても閉じる
    window.addEventListener('click', e => {
        if (e.target === modal) {
            modal.style.display = 'none';
        }
    });

    function formatGender(gender) {
        switch (gender) {
            case 1: return '男性';
            case 2: return '女性';
            case 3: return 'その他';
            default: return '-';
        }
    }

    function formatDate(dateString) {
        const date = new Date(dateString);
        return date.toLocaleDateString('ja-JP');
    }
});

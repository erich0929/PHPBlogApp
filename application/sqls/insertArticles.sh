#!/bin/sh
i=1
boardName='Football'

author='erich0929'
content='자국 통화가치의 최근 변동폭과 외환보유고 변동 지표를 활용해 산출하는 외환시장압력지수는 현재 주어진 환율수준에서 시장에 존재하는 외화 초과공급(혹은 수요)를 반영한 것이다. 지수가 플러스이면 자국 통화가치 상승압력이, 마이너스이면 절하압력이 있음을 뜻한다. 각국 중앙은행이 불황을 막으려고 돈을 풀고 금리를 내리는 통화전쟁에 돌입하면서 상대적으로 자국 통화가치가 상승하고 있으며, 이에 따라 적정 균형환율로 복원하기 위한 자국 통화가치 절하압력이 시장에서 고조되고 있는 것이다.\n점점 증가하는 시장 압력을 반영해 2013년 1월 이후 동아시아 주요국의 달러 대비 통화 가치는 모두 연쇄적으로 절하됐다. 절하폭은 일본 엔화(-25%)·인도네시아 루피아(-24.2%)·말레이시아 링기트(-16.1%)·태국 달러(-10.7%) 순이다. 게다가 동남아 각국은 경기 회복세가 미약하고 미국의 기준금리 인상이 지연되면서 통화완화에 더 적극적으로 나설 가능성이 커지고 있다.\n동아시아 쪽을 보면, 위안화는 지난해 2분기 위안화 절하압력(외환시장압력지수 -1.79포인트)이 있었는데, 그 뒤 달러당 위안화는 실제로 전 분기의 6.10위안에서 6.23위안으로 상승(가치 절하)한 바 있다. 엔화의 외환시장압력지수는 지난해 3분기 -0.89포인트에서 4분기에 -2.41포인트로 높아져 추가 절하압력이 강화되고 있다.\n각 상대국의 경쟁적 통화완화 속에 원화도 지난해 3분기 이후 절하 압력이 커지고 있다.'
date='unix_timestamp(now())'
sql=''
while [ $i -lt 50000 ]
do
title='통화가치 절하 도미노, 동남아까지 번지나'$i
mysql -u admin --password=2642805 -h 192.168.10.101 blog << EOF
insert into Articles (boardName, title, author, content, date) values ('$boardName','$title', '$author', '$content', $date);
EOF
i=`expr $i + 1`
#sleep 1
done
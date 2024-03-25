import Header from '@/app/(app)/Header'
import Cookies from 'js-cookie';

const token = Cookies.get('XSRF-TOKEN');
// axios.defaults.headers.common['Authorization'] = `Bearer ${token}`;

export const metadata = {
    title: 'Fakebook',
}

const Home = async () => {

    // const response = await fetch(`http://127.0.0.1:8000/api/post/1`, {
    //     method: 'GET',
    //     headers: {
    //         'Content-Type': 'application/json',
    //         'Authorization': `Bearer eyJpdiI6Im9HMklVa1lPY2NacjVmeEM0RTVJQUE9PSIsInZhbHVlIjoiOUFIUzkyWWwycnhiSWcrRTZEdXQvdkowQnd2cUppT0pBZ1ZhUGFURHU3Q1NqTytKV1N0d0tlVDRuYkxVdEdJYVpZRENmRThyZHlWR05ZclBuYWZQVGJTQytSS09BeHVxdXlxTjI0eThLMmlJSU9Wcm1CNmdlTlZBb1VZQTFwbTQiLCJtYWMiOiJjZTkxZDViYzk2NTUzNTZlYTdjYWZkYzgzOGY0NWM3ZDYxMzY0NmU3MGQ1ZTkxYzIzMjg4MTU5N2EzOGQ5MDc5IiwidGFnIjoiIn0%3D`
    //     },
    // });
    // const result = await response.json();
    // console.log(result);

    return (
        <div className="py-12 bg-[#242526]">
        </div>
    )
}

export default Home
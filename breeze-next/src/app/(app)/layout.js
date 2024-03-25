'use client'

import { useAuth } from '@/hooks/auth'
import Navigation from '@/app/(app)/Navigation'
import Loading from '@/app/(app)/Loading'
import Header from './Header'

const AppLayout = ({ children, header }) => {
    const { user } = useAuth({ middleware: 'auth' })

    if (!user) {
        return <Loading />
    }

    return (
        <div className="min-h-screen bg-[#18191A]">
            {/* <Header title="Dashboard" /> */}
            <Navigation user={user} />
            <div className='text-white grid grid-cols-12 gap-4'>
                <div className='col-span-3'>Navbar</div>
                <main className='col-span-6'>{children}</main>
                <div className='col-span-3'>Chat</div>
            </div>
        </div>
    )
}

export default AppLayout
